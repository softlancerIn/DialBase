<x-admin.layout type="scraping">
    <div class="dashboard-widg-bar d-block" id="app">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-globe me-2 theme-cl fs-sm"></i>Scrape Website
                            </h4>
                        </div>
                    </div>

                    <div class="_dashboard_content_body py-3 px-3">
                        <scraper-component :categories="{{ $categories->toJson() }}"
                            store-url="{{ route('store_scraped_data') }}">
                        </scraper-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
