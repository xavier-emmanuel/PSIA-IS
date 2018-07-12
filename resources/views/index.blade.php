@extends('layouts.master')

@section('stylesheets')
@endsection
@section('content')
	<main>

  </main>
@endsection
@section('scripts')
	<script>
		$(document).ready(function(){
        if(localStorage.getItem("Verified"))
        {
            $.toast({
                heading: 'Success',
                text: 'Your account has been successfully verified.',
                position: 'top-right',
                icon: 'success',
                hideAfter: 3500
            });
            localStorage.clear();
        }
    });
	</script>
@endsection