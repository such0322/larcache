/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var ArticleForm=React.createClass({
    getInitialState: function() {
      return {title: '', content: ''};
    },
    handleTitleChange:function(e){
        this.setState({title: e.target.value});
    },
    handleContentChange:function(e){
        this.setState({content: e.target.value});
    },
    handleSubmit:function(e){
        e.preventDefault();
        this.doSubmit();
    },
    doSubmit:function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("/larcache/public/blog",
            this.state,
            function(data,status){
                data=$.parseJSON(data);
                if(data.status==1){
                    window.location.href="/larcache/public/blog"; 
                }else{
                    console.log(data.message)
                }
            }.bind(this));
    },
    render:function(){
        return (<form className="form-horizontal" role="form" onSubmit={this.handleSubmit}>
                    <div className={"form-group "}>
                        <label htmlFor="inputTitle" className="col-sm-4 control-label">标题</label>
                        <div className="col-sm-4">
                            <input type="text" className="form-control" id="inputTitle" placeholder="Title" value={this.state.title} onChange={this.handleTitleChange} />
                        </div>
                    </div>
                    <div className="form-group">
                        <label htmlFor="inputContent" className="col-sm-4 control-label">内容</label>
                        <div className="col-sm-6">
                            <textarea rows="10" className="form-control" id="inputContent" placeholder="这是填写文章信息" onChange={this.handleContentChange} value={this.state.content} />
                        </div>
                    </div>
                    <div className="form-group">
                        <div className="col-sm-offset-4 col-sm-8">
                            <button type="submit" className="btn btn-default">确认</button>
                            <button type="reset" className="btn btn-default">取消</button>
                        </div>
                    </div>
                </form>)
    }
})


ReactDOM.render(
        <ArticleForm  />,
        document.getElementById('content')
);