@if(!empty($breadcrumb))
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $breadcrumb->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach ($breadcrumb->list as $item)
                            <li class="breadcrumb-item"><a href="#">{{ $item }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endif
