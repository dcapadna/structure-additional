<?php

namespace Dcapi\Structure\Additional\App\Http\Controllers;


use App\Http\Controllers\BaseController;
use Dcapi\Structure\Setting\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mews\Captcha\Captcha;
use Mews\Captcha\CaptchaController;
use Morilog\Jalali\Jalalian;

class AdditionalController extends BaseController
{
    public function getNameMonths(Request $request)
    {

        $month = (int)convertNumber(toJalali(now(), "m"));
        $year = (int)convertNumber(toJalali(now(), "Y"));
        $current = (new Jalalian($year, $month, 18))->format("%B");
        $before_month = (new Jalalian($year, $month, 18))->subMonths(1)->format("%B");
        $tow_before_month = (new Jalalian($year, $month, 18))->subMonths(2)->format("%B");
        $data = [
            'before_month' => $before_month,
            'tow_before_month' => $tow_before_month,
            'current'=>$current
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    public function years(Request $request)
    {
        $years= [];
        $year_curent = (int)convertNumber(toJalali(now(), "Y"));
        for($y=1400;$y<=$year_curent;$y++)
            $years[] = $y;
        $data = [
            'years' => $years
        ];

        return $this->responseData(self::SUCCESS, $data);
    }

    public function fetchonlinetse(Request $request)
    {
        $result = file_get_contents("https://www.metawave.ir/fetchonlinetse.php");
        $result = json_decode($result);
        $result->date = jdate(now())->format("%A, %d %B %Y  ");
        $result->time = jdate(now())->format(" H:i:s");

        return response()->json($result);
    }


    public function onlinetse()
    {
        return view('additinal::additinal.onlinetse');
    }

    /**
     * @OA\Get(
     *      path="/api/v1/additional/recaptcha",
     *      summary="recaptcha",
     *      description="recaptcha",
     *      operationId="authStore",
     *      tags={"recaptcha"},
     *    @OA\Response(
     *         response=200,
     *         description="get recaptcha",
     *         @OA\JsonContent(
     *            @OA\Property(property="status", type="string", example="Success"),
     *            @OA\Property(
     *                  property="meta",
     *                  type="object",
     *                  @OA\Property(
     *                     property="user",
     *                     type="object",
     *                         @OA\Property(property="code", type="json", example="200"),
     *                         @OA\Property(property="message", type="json", example="با موفقیت انجام گردید")
     *                  )
     *            ),
     *            @OA\Property(
     *                  property="data",
     *                  type="object",
     *                  @OA\Property(
     *                      property="image",
     *                      type="object",
     *                          @OA\Property(property="sensitive", type="datatime", example="false"),
     *                          @OA\Property(property="key", type="int", example="$2y$10$9X.O0hrXw6OZVAvo5KF29uWs9kWzRe.flQnPFC7sIYYOb4p3C.4W6"),
     *                          @OA\Property(property="img", type="string", example="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAkCAYAAABCKP5eAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAd/ElEQVR4nLWbebQkVZ3nPzf2iNzeXntBFUVVQSHFDiKoLCKIDuM6toP2ObSt7TitOB6ndewWe7T1YNsq6ujMNArSiDoy4lGBQbHBhqoCirWgFgqqCqGoerw1X2ZGRmSs80fkvS/yUfY53XMmzsmT72VGRtz7W7/f3+8X4s4778x1XUcIgaZp5HlOkiRkWYau6+i6jmEYAAghEEIM/"),
     *
     *        ),
     *          )
     *        )
     *      ),
     * )
     *
     */
    public function recaptcha(Request $request,Captcha $captcha)
    {
        $class =  new CaptchaController();
        $data = [
            "image"=> $class->getCaptchaApi($captcha,'flat')
        ];
        return $this->responseData(self::SUCCESS,$data);
    }

    public function convertPricetoPoint(Request $request)
    {
        $price = $request->price;
        $point = 0;
        $every_score = Definition::where("key", env("cost_public_marketer", "ny0GB4xT3e"))->first();
        if($every_score)
            $point = $price * $every_score->value;
        $data = [
            'point' => $point
        ];
        return $this->responseData(self::SUCCESS, $data,"امتیاز تبدیل شده");

    }

}
