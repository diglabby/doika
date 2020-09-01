<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('notifications')->truncate();
        \DB::table('notifications')->insert([
            [
                'purpose' => 'thanks',
                'title'   => 'Паспяховы плацёж на <назва сайта>',
                'body'    => 'Паважаны прыхільнік,
                Ахвяраванне паспяхова зроблена. Дзякуй! Вы таксама можаце падпісацца на ахвяраванні для нашага праекта',
                'regular' => false,
            ],
            [
                'purpose' => 'welcome',
                'title'   => 'Вітальны мэйл для падпісчыка сбору сродкаў для <назва сайта>',
                'body'    => 'Паважаны ахвярадаўца!

Наша каманда дзякуе Вас за аформленую падпіску па збору сродкаў (мэту кампаніі можна знайсці на нашым сайце "www"). У адпаведнасці з ёй з Вашай банкаўскай карткі штомесяцова будуць спісвацца грашовыя сродкі ў памеры, абраным пры першай аплаце.

Дзякуй за ўдзел! З павагай,
<назва сайта>

Калі Вы вырашылі адмовіцца ад падпіскі, Вам неабходна перайсці па наступнай спасылцы: <спасылка, якая робіць адпіску>
',
                'regular' => true,
            ],
            [
                'purpose' => 'beforepayment',
                'title'   => 'Папярэджанне перад зняццём грошай падчас падпіскі для <назва сайта>',
                'body'    => 'Паважаны ахвярадаўца!

Наша каманда нагадвае, што праз некалькі дзён з Вашай банкаўскай карты будуць спісаныя грашовыя сродкі ў рамках аформленай падпіскі па збору сродкаў.

Дзякуй за ўдзел!
З павагай,
<назва сайта>

Калі Вы вырашылі адмовіцца ад падпіскі, Вам неабходна перайсці па наступнай спасылцы: <спасылка, якая робіць адпіску>',
                'regular' => true,
            ],
            [
                'purpose' => 'thanksregular',
                'title'   => 'З нагоды зняцця ахвяравання памесяцова для <назва сайта>',
                'body'    => 'Ахвяраванне паспяхова зроблена. Дзякуй! Калі Вы вырашылі адмовіцца ад падпіскі, Вам неабходна перайсці па наступнай спасылцы: <спасылка, якая робіць адпіску>',
                'regular' => true,
            ],
            [
                'purpose' => 'campaignstop',
                'title'   => 'Кампанія сайта <назва сайта> спынена',
                'body'    => 'Прывітанне,
Дзякуй за удзел у нашай кампаніі па збору сродкаў. Мы хочам паведаміць, што кампанія спынена, а таксама вашы штомесяцовыя адлічэнні',
                'regular' => true,
            ],
            [
                'purpose' => 'changedate',
                'title'   => 'Змена тэрміну кампаніі <назва сайта>',
                'body'    => 'Паважаны ахвярадаўца!
Грамадская арганізацыя "N" паведамляе, што перыяд правядзення кампаніі па зборы сродкаў падоўжаны да <дд-мм-гггг>.

Дзякуй за ўдзел!
З павагай,
<назва сайта>

Калі Вы вырашылі адмовіцца ад падпіскі, Вам неабходна перайсці па наступнай спасылцы: <спасылка, якая робіць адпіску>
',
                'regular' => true,
            ],
            [
                'purpose' => 'paymentfail',
                'title'   => 'Ахвяраванне на <назва сайта> не прайшло. Прычыны',
                'body'    => 'Штосьці пайшло не так...
  а) Плацёж адхілены банкам. Калі ласка, паспрабуйце яшчэ раз.
  б) Плацёж не праведзены. Праверце рэквізіты банкаўскай карткі.
  в) Плацёж адхілены банкам. Праверце ці маеце дастаткова сродкаў.',
                'regular' => false,
            ],
            [
                'purpose' => 'paymentfail',
                'title'   => 'Ахвяраванне на <назва сайта> не прайшло. Прычыны',
                'body'    => 'Штосьці пайшло не так...
  а) Плацёж адхілены банкам. Калі ласка, паспрабуйце яшчэ раз.
  б) Плацёж не праведзены. Праверце рэквізіты банкаўскай карткі.
  в) Плацёж адхілены банкам. Праверце ці маеце дастаткова сродкаў.',
                'regular' => true,
            ],

        ]);
    }
}
