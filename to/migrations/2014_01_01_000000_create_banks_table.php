<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });

        $this->seed();
    }

    protected function seed()
    {
        $banks = [
            '中国工商银行', '中国建设银行', '中国农业银行', '中国银行', '中国交通银行', '中国招商银行', '光大银行', '浦发银行',
            '华夏银行', '广东发展银行银行', '中信银行', '兴业银行', '民生银行', '杭州银行', '上海银行', '宁波银行', '平安银行'
        ];
        foreach ($banks as $bank) {
            \App\Model\Bank::create(['name' => $bank]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
