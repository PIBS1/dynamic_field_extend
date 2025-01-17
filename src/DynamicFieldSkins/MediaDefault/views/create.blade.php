<script src="/assets/vendor/jqueryui/jquery-ui.min.js"></script>
<script src="/assets/vendor/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="/assets/vendor/jQuery-File-Upload/js/jquery.fileupload.js"></script>
@expose_route('auth.admin')
@expose_route('media_library.index')
@expose_route('media_library.drop')
@expose_route('media_library.get_folder')
@expose_route('media_library.store_folder')
@expose_route('media_library.update_folder')
@expose_route('media_library.move_folder')
@expose_route('media_library.get_file')
@expose_route('media_library.update_file')
@expose_route('media_library.modify_file')
@expose_route('media_library.move_file')
@expose_route('media_library.upload')
@expose_route('media_library.download_file')
<div class="xe-form-group xe-dynamicField">
    <label class="xu-form-group__label __xe_df __xe_df_text __xe_df_text_basic">{{xe_trans($config->get('label'))}}</label>
    <div>
        <button type="button" class="xe-btn" onclick=media_popup("{{$config->get('id')}}")><i class="xi-plus"></i> 미디어
            라이브러리
        </button>

    </div>
    <ul class="thumb_{{$config->get('id')}}" style="padding-left: 0px;"></ul>
    {{--<input type="hidden" name="{{$config->get('id').'_column'}}" id="{{$config->get('id').'_column'}}" value="{{$config->get('id')}}">--}}
</div>
<script>
    //id : 유저id
    //rating : 유저권한
    var user = {
        id: XE.config.getters['user/id'],
        rating: XE.config.getters['user/rating']
    }

    function media_popup(media_id) {
        var cnt = 0;

        XE.app('MediaLibrary').then(function (appMediaLibrary) {
            appMediaLibrary.open({
                listMode: 2,
                user: user,
                selected: function (mediaList) {
                    //$('.thumb_' + media_id).empty();
                    $.each(mediaList, function () {
                        //that._renderMedia(this, $form)
                        //that._insertToDocument(that._normalizeFileData(this), $form)
                        //console.log(mediaList[0]['file']);

                        {{--for(var key in mediaList) {--}}
                        {{--//console.log(mediaList[key]);--}}
                        {{--$('.thumb_{{$config->get('id')}}').append('<img src='+mediaList[key]['file']['url']+'>');--}}
                        {{--}--}}
                        //console.log(mediaList[cnt]['file']);


                        var over_chk = $('.thumb_' + media_id).find("input." + mediaList[cnt]['file']['id']).val();
                        //console.log(mediaList[cnt]['file']['url']);
                        if(mediaList[cnt]['file']['id'] != "") {
                            if (over_chk == null) {
                                var img_string = '';

                                if(checkURL(mediaList[cnt]['file']['filename'])) {
                                    img_string = '<li class="media_li" onclick="media_del(this)"><img width=100px height=100px src=' + mediaList[cnt]['file']['url'] + '>';
                                    img_string += '<input type="hidden" name="' + media_id + '_column[]" class="' + mediaList[cnt]['file']['id'] + '" value=' + mediaList[cnt]['file']['id'] + '>';
                                    img_string += '<button type="button" class="btn-delete media_del_btn"><i class="xi-close"></i><span class="xe-sr-only">첨부삭제</span></button>';
                                    img_string += '</li>';
                                }else{
                                    img_string = '<li class="media_li" onclick="media_del(this)">'+mediaList[cnt]['file']['clientname'];
                                    img_string += '<input type="hidden" name="' + media_id + '_column[]" class="' + mediaList[cnt]['file']['id'] + '" value=' + mediaList[cnt]['file']['id'] + '>';
                                    img_string += '<button type="button" class="btn-delete media_del_btn"><i class="xi-close"></i><span class="xe-sr-only">첨부삭제</span></button>';
                                    img_string += '</li>';

                                }

                                if (mediaList[cnt]['file']['filename']) {

                                    $('.thumb_' + media_id).append(img_string);
                                }

                                cnt++;
                            }

                        }
                    })
                }
            })
        })
    }

    function media_del(my_data) {
        my_data.parentNode.removeChild(my_data);
    }

    function checkURL(url) {
        return(url.match(/(.*?)\.(jpg|jpeg|png|gif|bmp|pdf)$/) != null);
    }


</script>

<style>
    .media_li {
        position: relative;
        list-style-type: none;
        display: inline;
        margin-right: 12px;
    }

    .media_li:hover {
        cursor: pointer;
    }

    .media_del_btn{
        position: absolute;
        z-index: 5;
        right: 4px;
        padding: 0;
        width: 18px;
        line-height: 18px;
        cursor: pointer;
        color: #fff;
        border: none;
        outline: none;
        background-color: transparent;
        /*top:-77px;*/
        font-size:12px;
    }

</style>
