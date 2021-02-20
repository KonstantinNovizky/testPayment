@extends('layouts.main')
@section('main')
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<div
				class="login100-pic js-tilt"
				data-tilt
			>
				<img
					src="images/img-01.png"
					alt="IMG"
				>
			</div>

			<form class="login100-form validate-form">
				<span class="login100-form-title">
					FORGET PASSWORD
				</span>

				<div
					class="wrap-input100 validate-input"
					data-validate="Valid email is required: ex@abc.xyz"
				>
					<input
						class="input100"
						type="text"
						name="email"
						placeholder="Email"
					>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i
							class="fa fa-envelope"
							aria-hidden="true"
						></i>
					</span>
				</div>



				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Submit
					</button>
				</div>

				<div class="text-center p-t-12">
					<span class="txt1">

					</span>
					<a
						class="txt2"
						href="{{ url('/') }}"
					>
						BACK
					</a>
				</div>


			</form>
		</div>
	</div>
</div>

@endsection
@section('customjs')

<script>
	$('.js-tilt').tilt({
			scale: 1.1
		})
</script>

@endsection