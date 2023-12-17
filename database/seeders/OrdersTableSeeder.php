<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 2495000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'SRMDTA5L',
                'created_at' => '2023-07-01 10:13:20',
                'updated_at' => '2023-07-01 10:13:20',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 250000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'WJSCCMXP',
                'created_at' => '2023-07-01 10:17:05',
                'updated_at' => '2023-07-01 10:17:05',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 541000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'JNEFMTAW',
                'created_at' => '2023-07-01 10:19:22',
                'updated_at' => '2023-07-01 10:19:22',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 398000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'JZ4OQZIN',
                'created_at' => '2023-07-01 10:21:02',
                'updated_at' => '2023-07-01 10:21:02',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 220000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'HI3BOZFE',
                'created_at' => '2023-07-01 10:21:43',
                'updated_at' => '2023-07-01 10:21:43',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 3014000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'IHZA53II',
                'created_at' => '2023-07-01 10:24:22',
                'updated_at' => '2023-07-01 10:24:22',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 1880000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'SC0XPTAE',
                'created_at' => '2023-07-01 10:25:16',
                'updated_at' => '2023-07-01 10:25:16',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 2400000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'BDB2RPH1',
                'created_at' => '2023-07-01 10:25:48',
                'updated_at' => '2023-07-01 10:25:48',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 420000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'JYSP8L47',
                'created_at' => '2023-07-01 10:26:17',
                'updated_at' => '2023-07-01 10:26:17',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 188000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => '8RKISFLF',
                'created_at' => '2023-07-01 10:26:44',
                'updated_at' => '2023-07-01 10:26:44',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 430000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'AQEY5ZDK',
                'created_at' => '2023-07-01 10:30:02',
                'updated_at' => '2023-07-01 10:30:02',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 1140000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => '9B43MP9P',
                'created_at' => '2023-07-01 10:30:39',
                'updated_at' => '2023-07-01 10:30:39',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 1324500.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => '5SY3O885',
                'created_at' => '2023-07-01 10:32:14',
                'updated_at' => '2023-07-01 10:32:14',
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 2,
                'email' => 'nguoidungkten3@gmail.com',
                'total' => 680000.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'TXTFOKFH',
                'created_at' => '2023-07-01 10:32:56',
                'updated_at' => '2023-07-01 10:32:56',
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 3,
                'email' => 'kiratoryu122@gmail.com',
                'total' => 1084000.0,
                'order_status' => 'Done',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'KGIW0ND8',
                'created_at' => '2023-07-07 21:59:50',
                'updated_at' => '2023-07-07 21:59:50',
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 3,
                'email' => 'kiratoryu122@gmail.com',
                'total' => 1845000.0,
                'order_status' => 'Done',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'D269KJW8',
                'created_at' => '2023-07-07 22:03:50',
                'updated_at' => '2023-07-07 22:03:50',
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 999999.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'XURGXTNK',
                'created_at' => '2023-06-01 23:23:51',
                'updated_at' => '2023-07-07 23:23:51',
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 846908.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'TQYAMHGX',
                'created_at' => '2023-06-02 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 949114.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'CQZVFBYH',
                'created_at' => '2023-06-03 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 25128.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'TORJDDRO',
                'created_at' => '2023-06-04 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 62473.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'FFKBLGUS',
                'created_at' => '2023-06-05 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 379218.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'BXRWDJDJ',
                'created_at' => '2023-06-06 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 313845.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'DWVDQTSC',
                'created_at' => '2023-06-07 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 692297.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'PPCAKXCU',
                'created_at' => '2023-06-08 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 376251.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'DQHVDHCA',
                'created_at' => '2023-06-09 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 98022.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'ELPKWLZF',
                'created_at' => '2023-06-10 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 698671.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'SGPGJMYU',
                'created_at' => '2023-06-11 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 750387.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'YWFECXLW',
                'created_at' => '2023-06-12 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 750387.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'MJPSUGLM',
                'created_at' => '2023-06-13 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 750387.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'WTVAUNLL',
                'created_at' => '2023-06-14 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 237160.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'BVERXEVZ',
                'created_at' => '2023-06-15 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 648589.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'EKVFMGEF',
                'created_at' => '2023-06-16 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            32 => 
            array (
                'id' => 33,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 955595.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'XAXTNLQG',
                'created_at' => '2023-06-17 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            33 => 
            array (
                'id' => 34,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 955595.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'GDRYOCWU',
                'created_at' => '2023-06-18 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            34 => 
            array (
                'id' => 35,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 955595.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'BTFDXDMV',
                'created_at' => '2023-06-19 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            35 => 
            array (
                'id' => 36,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 80149.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'SWRYNRNV',
                'created_at' => '2023-06-20 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            36 => 
            array (
                'id' => 37,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 299261.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'JZVOVEMD',
                'created_at' => '2023-06-21 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            37 => 
            array (
                'id' => 38,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 106690.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'DIBFOHUB',
                'created_at' => '2023-06-22 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            38 => 
            array (
                'id' => 39,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 624190.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'FFVYTEKV',
                'created_at' => '2023-06-23 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            39 => 
            array (
                'id' => 40,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 20766.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'JNQVUYIS',
                'created_at' => '2023-06-24 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            40 => 
            array (
                'id' => 41,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 492679.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'GPLAFPQW',
                'created_at' => '2023-06-25 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            41 => 
            array (
                'id' => 42,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 68328.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'MLPMWYBJ',
                'created_at' => '2023-06-26 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            42 => 
            array (
                'id' => 43,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 559359.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'PEYWYAFF',
                'created_at' => '2023-06-27 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            43 => 
            array (
                'id' => 44,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 559359.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'HLTPNZLO',
                'created_at' => '2023-06-28 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
            44 => 
            array (
                'id' => 45,
                'user_id' => 1,
                'email' => 'admin@gmail.com',
                'total' => 559359.0,
                'order_status' => 'Pending',
                'pay_type' => 'VNPAY',
                'order_id_ref' => 'CHTONGXY',
                'created_at' => '2023-06-29 23:24:28',
                'updated_at' => '2023-06-02 23:24:28',
            ),
        ));
        
        
    }
}