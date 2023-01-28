<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.layouts.head')

</head>
<body onload="getMassage()" >

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="waviy">
        <span style="--i:1">L</span>
        <span style="--i:2">o</span>
        <span style="--i:3">a</span>
        <span style="--i:4">d</span>
        <span style="--i:5">i</span>
        <span style="--i:6">n</span>
        <span style="--i:7">g</span>
        <span style="--i:8">.</span>
        <span style="--i:9">.</span>
        <span style="--i:10">.</span>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    @include('admin.layouts.logo-header')
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    @include('admin.layouts.headerbar')
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('admin.layouts.admin-sidebar')
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    @include('admin.layouts.content-body')
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    @include('admin.layouts.footer')
    <!--**********************************
        Footer end
    ***********************************-->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->


@include('admin.layouts.script')

</body>
</html>
