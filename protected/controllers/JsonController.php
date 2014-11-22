<?php
class JsonController extends Controller
{
    public function actionGetAds($device_id)
    {
        $deviceId = $device_id;
        $sql = "select id from ad where count_showed < count_ordered and ad_place_id=".(int)$deviceId." order by id asc limit 10";
        $c = Yii::app()->db->createCommand($sql);
        /** @var $c CDbCommand */
        $ids = $c->queryColumn();
        $ads = Ad::model()->findAllByAttributes(['id' => $ids]);

        $result = [];

        foreach ($ads as $ad) {
            /** @var $ad Ad */
            $result[] = [
                "ad_id" => $ad->id,
                "ad" => $ad->string,
                "time" => time(),
                "count" => $ad->count_ordered-$ad->count_showed,
            ];
        }

        $this->renderResult($result);
    }

    public function actionRegisterAdShow($ad_id, $count = 1)
    {
        $ad = Ad::model()->findByPk($ad_id);
        if (!$ad) {
            throw new CHttpException(404, "ad not found");
        }

        $transaction = Ad::model()->getDbConnection()->beginTransaction();
        try {
            $ad->count_showed += $count;
            $ad->save();
            $log = new ShowLog();
            $log->ad_id = $ad->id;
            $log->count = $count;
            $log->save();

            $transaction->commit();
            $this->renderResult(["ok" => true]);
        } catch (Exception $e) {
            $transaction->rollback();
            $this->renderResult(["ok" => false, "message" => "Data saving failed, resend data please. Details: ".$e->getMessage()]);
        }


    }

    private function renderResult($result)
    {
        header("Content-type: text/javascript; charset=utf8");

        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}

