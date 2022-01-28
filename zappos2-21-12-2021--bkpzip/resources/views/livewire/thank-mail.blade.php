<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>Zappos Order</title>
	</head>
	<style type="text/css">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
		</style>
	</style>
	<body style="margin: 0; padding: 0 1em; max-width: 36.8em; width: 100%; margin: 0 auto;font-family: 'Open Sans', sans-serif; font-size: 1.1em; color: #202223; line-height: 1.6em; font-weight: 400;text-align: center;">
		
		<table cellpadding="0" cellspacing="0" style=" padding: 2.5em 0em;">
			<tbody>
				<tr>
					<td>
						<img src="{{ URL::asset('mail-img/thumbs-up.png') }}" style="width: 7em; height: 7em; ">
					</td>
				</tr>
				<tr>
					<td>
						<h1 style=" margin: 0.1em 0 0.2em; font-size: 2.34em; font-weight: 900; line-height: 46px; color: #035d59;">Welcome to Zappos!</h1>
					</td>
				</tr>
				<tr>
					<td>
						<p>Welcome messages are vital for educating customers and motivate them to take the right actions. It helps as a stepwise guide to proceed to use the product or service in the proper way. </p>
					</td>
				</tr>
				<tr>
					<td>
						<a href="{{ route('home') }}"><button style=" background-color: #035d59; border: none; color: #fff; padding: 15px 25px; display: inline-block; font-size: 1.02em; font-weight: 500; border-radius: 8px; margin-top: 1em; line-height: 22px;cursor: pointer; letter-spacing: 0.02em; text-transform: uppercase;">Login</button></a>
					</td>
				</tr>
				<tr>
					<td style="text-align: center; padding: 3em 15px 0; ">
						<img src="{{ URL::asset('mail-img/zappos-logo.svg') }}" style="width: 8em; margin-bottom: 0.4em;">
						<span style=" width: 100%; display: block;"> © 2020-2021 - Company Name</span>
					</td>
				</tr>
			</tbody>
		</table>
				
	</body>
</html>

<div>
    {{-- Be like water. --}}
   
    <!-- <p>{{$data['name'] }}</p>
    <p>{{$data['message'] }}</p> -->
</div>
