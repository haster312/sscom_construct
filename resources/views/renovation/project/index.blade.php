@extends('renovation.layouts.main')
@section('title')
    {{ $projectCatTrans->projectCatName }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-30 padding-bottom-66">
            <div class="column column-1-1">
                <ul class="vertical-menu">
                    @foreach($listCatTrans as $index => $projectCat)
                        <li id="item-menu-{{$index}}" class="item-menu {{ $projectCat->projectCatId == $selected ? "selected" : ""}}">
                            <a href="{{ route($locale.".site.project",["categoryId"=>$projectCat->projectCatId,'categorySlug' => $projectCat->projectCatSlug]) }}" title="{{ $projectCat->projectCatName }}">
                                {{ $projectCat->projectCatName }}
                                <span class="template-arrow-menu"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="column column-1-1 margin-left-non margin-top-20">
            @if(count($attributes) > 0)
                <?php
                    $attributeName = "attribute_name_".$locale;
                    $optionName    = "option_name_".$locale;
                ?>
                <input type="hidden" name="projectCategory" value="{{ $projectCategory->projectCatId }}">
                <input type="hidden" name="locale" value="{{  $locale }}">

                <table id="search_option">
                    {!! Form::open(['id'=>'search_attribute']) !!}
                    @foreach($attributes as $attribute)
                        <?php $projectOptions = $attribute->AttributeOption ?>
                        @if(count($projectOptions) >0)
                        <tr>
                            <td width="30%">{{ $attribute->$attributeName }}</td>
                            <td>
                                <ul class="search-option">
                                @foreach($projectOptions as $option)
                                    <li><input type="radio" name="{{ $attribute->attribute_id }}" value="{{$option->option_id}}"> {{ $option->$optionName }}</li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    {!! Form::close() !!}
                </table>
                <div class="row margin-top-10">
                    <button type="button" name="search" class="btn btn-primary search-section" onclick="return filter()">{{ trans('attribute.search') }}</button>
                    <button type="button" name="reset" class="btn btn-primary search-section" onclick="return resetFilter()">{{ trans('attribute.reset') }}</button>
                </div>
            @endif
                <div class="row" id="search_result">
                    @include('renovation.project.project_paginate')
                </div>
                <div class="row pagination-row">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div data-total="{{ $total }}" id="projectListPagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            if($("#projectListPagination").data('total') > 6) {
                var totalPages = parseInt($("#projectListPagination").data('total') / 6);
                if ($("#projectListPagination").data('total') % 6 > 0) {
                    totalPages += 1;
                }
                $("#projectListPagination").bs_pagination({
                    //Must define all of this
                    currentPage: 1,
                    rowsPerPage: 6,
                    maxRowsPerPage: 200,
                    totalRows: $("#projectListPagination").data('total'),
                    totalPages: totalPages,

                    //When event chanage page number -> this function will be call automatically
                    onChangePage: function (event, data) {
                        projectList(data.currentPage, data.rowsPerPage);
                    }
                });
            }
        });

        function projectList(currentPage,rowsPerPage){
            var inputs = $('#search_option').find(':radio');
            var options = [];
            if(inputs.length > 0) {
                for(var k = 0; k < inputs.length; k++) {
                    var radio = inputs[k];
                    if($(radio).is(':checked')){
                        attribute    = $(radio).attr('name');
                        option_value = $(radio).val();
                        options[attribute] = option_value;
                    }
                }
            }
            var projectCatId = $('[name=projectCategory]').val();
            var locale = $('[name=locale]').val();
            var paginateData = {
                currentPage: currentPage,
                rowsPerPage: rowsPerPage,
                locale: locale,
                projectCatId: projectCatId,
                options: options
            };
            var request = $.ajax({
                type: "POST",
                url: SITE_ROOT + "/project/filter",
                data: paginateData,
                success: function (data) {
                    $("#search_result").html(data.html);
                    scrollingTo('search_option');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status,thrownError);
                }
            });
        }
        function resetFilter() {
            var inputs = $('#search_option').find(':radio');
            var options = [];
            if(inputs.length > 0) {
                for(var k = 0; k < inputs.length; k++) {
                    var radio = inputs[k];
                    $(radio).removeAttr('checked');
                }
            }
            var projectCatId = $('[name=projectCategory]').val();
            var locale = $('[name=locale]').val();
            var paginateData = {
                currentPage: 1,
                rowsPerPage: 6,
                locale: locale,
                projectCatId: projectCatId,
                options: options
            };
            $.ajax({
                type: "POST",
                url: SITE_ROOT + "/project/filter",
                data: paginateData,
                success: function (data) {
                    $("#search_result").html(data.html);
                    $("#projectListPagination").data("total", data.total);
                    var totalPages = parseInt($("#projectListPagination").data('total') / 6);
                    if($("#projectListPagination").data('total') % 6 > 0){
                        totalPages += 1;
                    }
                    $("#projectListPagination").bs_pagination({
                        //Must define all of this
                        currentPage: 1,
                        rowsPerPage: 6,
                        maxRowsPerPage: 200,
                        totalRows: $("#projectListPagination").data('total'),
                        totalPages: totalPages,

                        //When event chanage page number -> this function will be call automatically
                        onChangePage: function (event, data) {
                            projectList(data.currentPage, data.rowsPerPage);
                        }
                    });
                    $("#search_result").html(data.html);
                    scrollingTo('search_option');
                    if($("#projectListPagination").data('total') != 0) {
                        $("#projectListPagination").show();
                    } else {
                        $("#projectListPagination").hide();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status,thrownError);
                }
            });
        }
        function filter(){

            var inputs = $('#search_option').find(':radio');
            var options = [];
            if(inputs.length > 0) {
                for(var k = 0; k < inputs.length; k++) {
                    var radio = inputs[k];
                    if($(radio).is(':checked')){
                        attribute    = $(radio).attr('name');
                        option_value = $(radio).val();
                        options[attribute] = option_value;
                    }
                }
            }
            var projectCatId = $('[name=projectCategory]').val();
            var locale = $('[name=locale]').val();
            var paginateData = {
                currentPage: 1,
                rowsPerPage: 6,
                locale: locale,
                projectCatId: projectCatId,
                options: options
            };
            $.ajax({
                type: "POST",
                url: SITE_ROOT + "/project/filter",
                data: paginateData,
                success: function (data) {
                    $("#search_result").html(data.html);
                    $("#projectListPagination").data("total", data.total);
                    var totalPages = parseInt($("#projectListPagination").data('total') / 6);
                    if($("#projectListPagination").data('total') % 6 > 0){
                        totalPages += 1;
                    }
                    $("#projectListPagination").bs_pagination({
                        //Must define all of this
                        currentPage: 1,
                        rowsPerPage: 6,
                        maxRowsPerPage: 200,
                        totalRows: $("#projectListPagination").data('total'),
                        totalPages: totalPages,

                        //When event chanage page number -> this function will be call automatically
                        onChangePage: function (event, data) {
                            projectList(data.currentPage, data.rowsPerPage);
                        }
                    });
                    $("#search_result").html(data.html);
                    scrollingTo('search_option');
                    if($("#projectListPagination").data('total') != 0) {
                        $("#projectListPagination").show();
                    } else {
                        $("#projectListPagination").hide();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status,thrownError);
                }
            });
        }
        function scrollingTo(containId){
            $('html,body').animate({
                scrollTop: $('#'+containId).offset().top
            }, 1000);
        }
    </script>
@endsection