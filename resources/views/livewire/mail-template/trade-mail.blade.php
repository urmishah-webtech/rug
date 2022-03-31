<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>Rug Trade</title>
	</head>
	<style type="text/css">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
		</style>
	</style>

	<?php $MailMessage = App\Models\mail_notification::where('id', 2)->first(); ?>
	<body style="margin: 0; padding: 0 1em; max-width: 36.8em; width: 100%; margin: 0 auto;font-family: 'Open Sans', sans-serif; font-size: 1.1em; color: #202223; line-height: 1.6em; font-weight: 400;text-align: center;">
		
		<table cellpadding="0" cellspacing="0" style=" padding: 2.5em 0em;">
			<tbody>
				<tr>
					<td>
						<img src="{{ URL::asset('/assets/logo-blue-small._CB485919770_.svg')}}" style="width: 7em; height: 7em; ">
					</td>
				</tr>
				<tr>
					<td>
						<h1 style=" margin: 0.1em 0 0.2em; font-size: 2.34em; font-weight: 900; line-height: 46px; color: #035d59;">Welcome to Rug!</h1>
					</td>
				</tr>
				<tr>
					<td>
						<p>First name : {{$tradeget['firstname']}}</p>
						<p>Last Name : {{$tradeget['lastname']}}</p>
						<p>Email : {{$tradeget['email']}}</p>
						<p>Mobile Number : {{$tradeget['mobilenumber']}}</p>
						<p>Company Name : {{$tradeget['companyname']}}</p>
						<p>Company Website : {{$tradeget['companywebsite']}}</p>
						<p>message : {{$tradeget['message']}}</p>
					</td>
					<td>
						
					</td>				
				</tr>
				<tr>
					<td style="text-align: center; padding: 3em 15px 0; ">
						<img src="{{ URL::asset('mailimg/adminlogo.png') }}" style="width: 8em; margin-bottom: 0.4em;">
						<span style=" width: 100%; display: block;"> © 2020-2021 - Company Name</span>
					</td>
				</tr>
			</tbody>
		</table>
				
	</body>
</html>   
<div>
    {{-- Be like water. --}}

</div>
