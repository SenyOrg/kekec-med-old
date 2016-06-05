<div class="content-wrapper">
    {{-- Content Start --}}
    @yield('content-start')


    <!-- Content Header (Page header) -->
    <section class="content-header bg-gray-active">
        <h1>
            {{-- @todo Implement PageTitle and PageSubtitle --}}
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb" style="top: 5px;">
            {{--
                Header buttons
                @usage: <li><a href="#" class="btn btn-default">Save</a></li>
            --}}
            @yield('header-buttons')
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        {{--
            Content
        --}}
        @yield('content')
    </section>
    <!-- /.content -->
</div>

@include('layouts.app.deletemodal')
