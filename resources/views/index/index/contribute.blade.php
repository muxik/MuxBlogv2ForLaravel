@include('index.public.__head')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="widget radius-bordered">

                <div class="widget-body">
                    <form class="form-horizontal">
                        <input type="hidden" name="member_id" value="{{session('user.id')}}">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">文章名称</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title " name="title" placeholder="文章名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tags" class="col-sm-2 control-label no-padding-right">文章标签</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="文章标签" />
                                <p class="help-block">用|分开</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_id" class="control-label col-sm-2">所属导航</label>
                            <div class="col-sm-6">
                                <select name="cate_id" class="form-control">
                                    <option value="">请选择</option>
                                    @foreach ($cates as $vo)
                                    <option value="{{$vo->id}}">{{$vo->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label no-padding-right">文章简介</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="desc" cols="20" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label no-padding-right">文章内容</label>
                            <div class="col-sm-6">
                                <textarea name="content" id="mytextarea" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/index/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    $(function() {
        $('.up').hide();
        tinymce.init({
            selector: '#mytextarea'
        });

        $('.pagination').addClass('pagination-sm');

        $('form').submit(function(e) {
            var res = $(this).serialize();
            var url = '{{url("contribute")}}';
            $.ajax({
                url: url,
                data: res,
                type: 'post',
                success: function(data) {
                    if (data.code == 1) {
                        layer.alert(data.msg, {
                            icon: 6
                        }, function(index) {
                            layer.close(index);
                            location.href = data.url
                        })
                    } else {
                        layer.alert(data.msg, {
                            icon: 5
                        }, function(index) {
                            layer.close(index);
                        })
                    }
                }
            });
            return false;
        });
    });
    </script>
    @include('index.public.__foot')