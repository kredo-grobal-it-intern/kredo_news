<div class="modal fade modal-custom" id="search" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content p-4">
            <div class="search-header pb-2">
                <h5 class="modal-title text-center fw-bold">Search Filter</h5>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form action="{{ route('news.search')}}" method="POST">
                <div class="search-body px-2">
                        @csrf

                        <div class="mt-4">
                            <label class="form-label fw-bold">Search by Keyword</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter News Key Word" >
                        </div>

                        <div class="mt-4">
                            <label for="category" class="form-label fw-bold">Favorite Category</label>
                            <select name="category" id="category" class="form-select">
                                <option hidden>-- Choose Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="form-label fw-bold">Favorite Country</label>

                            <div class="px-3">
                                    @php
                                        $continents = ['Asia', 'America', 'Africa', 'Oceania', 'Europe',];
                                    @endphp
                                <div class="mb-3">
                                    @foreach ( $continents as $continent )
                                        <label class="form-label fw-bold d-block">{{ $continent }}</label>
                                        <div class="d-flex flex-wrap p-2">
                                            @php
                                                $continent_countries = $countries->filter(function($country) use($continent) {
                                                    return $country->continent == $continent;
                                                });
                                            @endphp
                                            @foreach ( $continent_countries as $country )
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" name="countries[]" value="{{ $country->id }}">
                                                    <label for="" class="form-check-lebel">{{ $country->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
                <div class="search-footer">
                    <input type="submit" class="d-block mx-auto border-0 btn-custom" value="SEARCH">
                </div>
            </form>
        </div>
    </div>
</div>