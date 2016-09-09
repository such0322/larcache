/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var LoginForm=React.createClass({
    getInitialState: function() {
      return {username: '', password: '',repassword:"",username_group:"",password_group:"",repassword_group:""};
    },
    handleUsernameChange:function(e){
        var value=e.target.value;
        this.setState({username:value});
    },
    handlePasswordChange:function(e){
        this.setState({password: e.target.value});
    },
    handleSubmit:function(e){
        e.preventDefault();
        var username=this.state.username.trim();
        var password=this.state.password;
        this.doSubmit(username,password);
    },
    doSubmit:function(username,password){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("/larcache/public/blog/user/login",{
            username:username,
            password:password
        },function(data,status){
            data=$.parseJSON(data);
            if(data.status==1){
                $.setCookie("user_token",data.token);
                window.location.href="/larcache/public/blog"; 
            }else{
                this.setState({username_group:"has-error"})
            }
        }.bind(this));
    },
    render:function(){
        return (<div className="col-sm-12">
            <form className="form-horizontal" role="form" onSubmit={this.handleSubmit}>
                <div className={"form-group "+this.state.username_group}>
                    <label htmlFor="inputUsername" className="col-sm-4 control-label">账号</label>
                    <div className="col-sm-4">
                        <input type="text" className="form-control" id="inputUsername" placeholder="Username" value={this.state.username} onChange={this.handleUsernameChange} />
                    </div>
                </div>
                <div className="form-group">
                    <label htmlFor="inputPassword" className="col-sm-4 control-label">密码</label>
                    <div className="col-sm-4">
                        <input type="password" className="form-control" id="inputPassword" placeholder="Password" value={this.state.password} onChange={this.handlePasswordChange}/>
                    </div>
                </div>
                <div className="form-group">
                    <div className="col-sm-offset-4 col-sm-8">
                        <button type="submit" className="btn btn-default">登录</button>
                        <button type="reset" className="btn btn-default">取消</button>
                    </div>
                </div>
            </form>
        </div>)
    }
});

ReactDOM.render(
        <LoginForm />,
        d.getElementById('content')
);