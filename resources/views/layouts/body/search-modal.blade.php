<div class="modal fade modal-custom" id="search" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom" role="document">
        <div class="modal-content p-4">
            <div class="search-header pb-2">
                <h5 class="modal-title text-center fw-bold">Search Filter</h5>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="search-body px-2">
                <form action="{{ route('news.search')}}" method="POST">
                    @csrf

                    <div class="mt-4">
                        <label class="form-label fw-bold">Search by Keyword</label>
                        <input type="text" class="form-control" name="search_keyword" placeholder="Enter News Key Word" >
                    </div>

                    <div class="mt-4">
                        <label for="category" class="form-label fw-bold">Favorite Category</label>
                        <select name="category" id="category" class="form-select">
                            <option hidden>-- Choose Category --</option>
                            <option value="">Health</option>
                            <option value="">Sports</option>
                            <option value="">Politics</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="form-label fw-bold">Favorite Country</label>

                        <div class="country px-3">

                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">America</label>

                                <div class="d-flex justify-content-between flex-wrap p-2">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">America</label>

                                <div class="d-flex justify-content-between flex-wrap p-2">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">America</label>

                                <div class="d-flex justify-content-between flex-wrap p-2">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">America</label>

                                <div class="d-flex justify-content-between flex-wrap p-2">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">America</label>

                                <div class="d-flex justify-content-between flex-wrap p-2">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input">
                                        <label for="" class="form-check-lebel">America</label>
                                    </div>
                                </div>
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