@extends('frontend.layouts.app')
@section('style')
<style>
  .custom-heart-empty {
    font-size: 2.5em;
    color: rgb(251, 210, 205);
  }
  .custom-heart {
    font-size: 2.5em;
    color: rgb(243, 121, 92);
  }
</style>
@endsection

@section('content')
<div class="container">

<input type="hidden" class="rating" data-filled="fa fa-heart custom-heart" data-empty="fa fa-heart custom-heart-empty"
      value="1.8" disabled="disabled"/>
@endsection

@section('script')
<script type="text/javascript">
$(function () {
 $('input').rating();
});
</script>
@endsection