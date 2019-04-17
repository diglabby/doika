<form action="/doika/doika/test-form" method="get">
    Amount of donation<br>
    <input type="text" name="amount"><br>
    Email<br>
    <input type="text" name="email"><br>
    Phone<br>
    <input type="text" name="phone"><br>
    Name<br>
    <input type="text" name="name"><br>
    Last Name<br>
    <input type="text" name="last_name"><br>
    <input type="hidden" name="campaign_id" value="@if(isset($campaign)){{ $campaign }}@endif">
    <input type="hidden" name="payment_interval" value="@if(isset($payment_interval)){{ $payment_interval }}@endif">
    <input type="submit">
</form>
