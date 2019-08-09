<div class="container-fluid">
    <div class="row d-flex justify-content-center top-buffer bottom-buffer">
        <div class="col-md-12 text-center top-buffer">
            <h1 class="nombre"> {{ $finance->name }}</h1>
            <object data="{{asset("storage/$finance->cover")}}" type="application/pdf" width="100%" height="800px">
                <p>It appears you don't have a PDF plugin for this browser.
                    No biggie... you can <a href="resume.pdf">click here to
                        download the PDF file.</a></p>
            </object>
        </div>
    </div>
    <div class="row top-buffer d-flex justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="product-description">
                <div class="description">{!! $finance->description !!}</div><br>
            </div>
        </div>
    </div>
</div>