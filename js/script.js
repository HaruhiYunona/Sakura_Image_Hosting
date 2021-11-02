            //获取objUrl.请输入文件对象
            function getObjectURL(file) {
                var url = null;
                if (window.createObjectURL != undefined) {
                    url = window.createObjectURL(file);
                } else if (window.URL != undefined) {
                    url = window.URL.createObjectURL(file);
                } else if (window.webkitURL != undefined) {
                    url = window.webkitURL.createObjectURL(file);
                }
                return url;
            }
            //重设画布与选择器大小
            function selectorDraw(type) {
                if (type == "fix") {
                    var cdimg = null;
                    var cdimg = $('#simg');
                    var cdfile = $('#sinput');
                    cdfile.css({
                        'width': cdimg.css('width'),
                        'height': cdimg.css('height')
                    });
                    cdfile.css({
                        'opacity': 0,
                        'position': 'absolute',
                        'z-index': 10
                    });
                } else {
                    var cdfile = $('.fileImgs1').children('input[type="file"]');
                    cdfile.css({
                        'width': 0,
                        'height': 0
                    });
                    cdfile.css({
                        'opacity': 0,
                        'position': 'absolute',
                        'z-index': 0
                    });
                }
            }

            //重置页面
            function refresh(type) {
                if (type == "true") {
                    $('#sub').html('再传一张');
                    $('#sub').blur();
                    $('img').css('visibility', 'hidden');
                    $('img').css('height', '200px');
                    $('.text').html('上传成功');
                    $('#imgsize').html('上传完成');
                    $('#img_data').attr('value', '');
                    $('#img_name').attr('value', '');
                } else {
                    $('#sub').html('上传图片');
                    $('#sub').blur();
                    $('img').css('visibility', 'visible');
                    $('img').css('height', 'auto');
                    $('.text').html('上传图片');
                    $('img').attr('src', './img/select.png')
                    $('#img_site').remove();
                    $('.copy').remove();
                    $('#img_data').attr('value', '');
                    $('#img_name').attr('value', '');
                    $('#imgsize').html('文件大小:NAN');
                    selectorDraw('fix');
                }
            }