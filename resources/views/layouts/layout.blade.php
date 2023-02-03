@include('layouts.header')

<div class="container mt-5">

    <div class="row">
        @yield('content')
    </div>

    @if ($selected_category == 0)
        <div class="row">
            <h5>What are You Planning </h5>
        </div>
    @endif

    <div class="row pl-5 pb-5 mt-4 d-flex align-items-start overflow-auto d-inline-block" id="results">
        {{-- <div class="container"> --}}

        @if ($selected_category == 0)
            <div class="row text-center">

                @foreach ($selectable_categories as $data)
                    @if (array_search($data['category_id'], $selected_categories) !== false)
                        <div class="card mr-3 p-2 shadow" style="width: 8rem;height: 10rem;">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }}"
                                class="card-img-top" alt="..."
                                style="object-fit: cover;border-radius: 3px; object-fit: cover;">

                            <a href="{{ route('remove_from_session', $data['category_id']) }}"
                                class="btn stretched-link">{{ $data['category_name'] }}</a>
                        </div>
                    @else
                        <div class="card mr-3 p-3"
                            style="background-color:transparent;width: 8rem;height: 10rem;border:none;">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }}"
                                class="card-img-top " alt="..."
                                style="object-fit: cover;border-radius: 3px; object-fit: cover;">

                            <a href="{{ route('add_to_session', $data['category_id']) }}"
                                class="btn  stretched-link">{{ $data['category_name'] }}</a>
                        </div>
                    @endif
                @endforeach

            </div>
        @endif
        {{-- </div> --}}
    </div>

    <div class="row mt-4">
        <div class="col">
            <h5>Showing results :</h5>
        </div>
    </div>

    <div class="row mt-5">
        @foreach ($properties as $data)
            <div class="card mr-4 mt-4" style="width:17rem;border-radius: 18px;">
                <img class="card-img-top p-3" src="data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }}"
                    style="border-radius: 23px;object-fit: cover;" />
                <div class="card-body">
                    <h4 class="card-title">{{ $data['property_name'] }}</h4>
                    <p class="card-text text-muted">Parrafo<br /></p><a href>Link</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-3">
        {{ $properties->links() }}
    </div>
</div>

@yield('scripts')

@include('layouts.footer')
