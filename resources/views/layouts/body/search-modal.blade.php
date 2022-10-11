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
                            <label class="form-label fw-bold search-input-label">Search by Keyword</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter News Key Word" required>
                            @error('keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="category" class="form-label fw-bold search-input-label">Favorite Category</label>
                            <select name="category" id="category" class="form-select">
                                <option disabled selected>-- Choose Category --</option>
                                @foreach ($all_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label class="form-label fw-bold search-input-label">Favorite Country</label>

                            <div class="px-3">
                                <div class="mb-3">
                                    @foreach ( $continents as $continent )
                                        <label class="form-label fw-bold d-block text-decoration-underline">{{ $continent }}</label>
                                        <div class="row px-3 mb-2">
                                            @php
                                                $countries_by_continent = $all_countries->filter(function($country) use($continent) {
                                                    return $country->continent == $continent;
                                                });
                                            @endphp
                                            @foreach ($countries_by_continent as $country)
                                                <div class="form-check col-xl-3 col-lg-4 col-6">
                                                    <input id="{{ $country->name }}" type="checkbox" class="form-check-input" name="countries[]" value="{{ $country->id }}">
                                                    <label for="{{ $country->name }}" class="form-check-lebel">{{ $country->name }}</label>
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