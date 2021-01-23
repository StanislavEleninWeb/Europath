@extends('layouts.app')

@section('header')
@endsection

@section('script')
@parent

<!-- Home js -->
<script src="{{ mix('js/home.js') }}" defer></script>

@endsection

@section('content')
			<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                

                <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">Province</div>
                            </div>

                            <div class="ml-4">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <select id="province" class="w-full">
                                        <option>* Please select province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">Region</div>
                            </div>

                            <div class="ml-4">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <select id="region" class="w-full disabled" disabled>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">City</div>
                            </div>

                            <div class="ml-4">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <select id="city" class="w-full disabled" disabled>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">Office</div>
                            </div>

                            <div class="ml-4">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <select id="office" class="w-full disabled" disabled>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="ml-4">
                                <table id="office_container" class="table table-hover">
                                    <tbody id="office_container"></tbody>
                                </table>
                            </div>

                            <div class="ml-4">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <div class="table-responsive-md">
                                      <table class="table table-hover">
                                        <tbody id="courier_container"></tbody>
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold">Search for courier by uuid</div>
                            </div>
                            <form id="uuid_form" method="GET" action="#" class="mt-1 ml-4">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="uuid_autocomplete" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input class="btn btn-outline-secondary" type="submit" value="Search" id="button-addon2">
                                </div>
                            </form>
                            <div class="table-responsive-md ml-4">
                              <table class="table table-hover">
                                <tbody id="uuid_autocomplete_container"></tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            
                        </div>
                    </div>
                </div>


            </div>
            
@endsection