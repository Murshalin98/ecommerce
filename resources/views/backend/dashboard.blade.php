@extends('backend.master')

@section('dashboard')
active
@endsection

@section('content')

<div class="sl-pagebody">
    <div class="row row-sm mg-t-20">
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Total Categories</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ $cat_count }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-info">- 3.4%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Trashed Categories</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ $cat_count_t }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-light">0.0%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Total Sub Categories</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ $scat_count }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-danger">- 4%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Trashed Sub Categories</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-teal tx-lato tx-center mg-b-15">{{ $scat_count_t }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-danger">- 3.4%</span> compared last month</p>
            </div>
        </div>
    </div>

    <div class="row row-sm mg-t-20">
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Total Products</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-purple tx-lato tx-center mg-b-15">{{ $products_count }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-success">0.0%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Trashed Products</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-purple tx-lato tx-center mg-b-15">{{ $products_count_t }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-success">0.0%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Product Colors</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-purple tx-lato tx-center mg-b-15">{{ $colors }}</h2>
                <p class="mg-b-0 tx-12"><span class="tx-success">0.0%</span> compared last month</p>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <div class="d-flex align-items-center justify-content-between mg-b-10">
                    <h6 class="card-body-title tx-12 tx-spacing-1">Popular Categories</h6>
                    <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
                </div>
                <h2 class="tx-purple tx-lato tx-center mg-b-15">
                    @forelse ($category as $item)
                    <h2>{{ $item->category_name }}</h2>
                    @empty

                    @endforelse</h2>
                <p class="mg-b-0 tx-12"><span class="tx-success">0.0%</span> compared last month</p>
            </div>
        </div>
    </div>
</div>

    <div class="row row-sm mg-t-20">
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 pd-sm-25">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>


@endsection

@section('footer_js')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Today', 'Yesterday', '2 Days ago'],
            datasets: [{
                label: '# of Votes',
                data: [{{$today}}, {{$one_day_ago}}, {{$two_days_ago}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>
@endsection
