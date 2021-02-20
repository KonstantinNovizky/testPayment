@extends('layouts.main')

@section('title')
    Trading Service
@endsection


@section('main')
    <main style="background:url({{ asset('images/banner2.png') }}) no-repeat center center/cover;height:100vh;">
        <div class="container">
            <x-main-navbar current="terms"></x-main-navbar>
        </div>

        <!-- Main section start here -->
        <div class="section">
            <div class="container">
                <div class="row ">
                    <h1 class="text-center font-weight-bold" style="width:100%;margin:auto;font-weight:bold;color:white">
                        Terms And Condations</h1>
                </div>
                <div class="row" style="margin-top:20%;">
                    <h4 style="color:black;">Disclaimer</h4>
                    <p class=" text-capitalize" style="color:black;">This site has been prepared solely for information
                        purpose, and is not for an offer to buy or sell or a solicitation or an offer to buy or sell any
                        security or instrument or to participate any particular trade strategy. the information
                        presented in this site is general information purpose only. allthough any attempt has been made
                        to assure accuracy. we assume no responsibility for error or omission. Examples are provided for
                        illustrative purpose only and should not been construed as instrument advise or strategy. the
                        information presented herein has not been desianed to meet the riaorous standerds set.</p>
                </div>
            </div>

        </div>
    </main>
@endsection
