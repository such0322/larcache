/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var UserForm=React.createClass({
    getInitialState: function() {
      return {username: '', password: '',repassword:"",username_group:"",password_group:"",repassword_group:""};
    },
    handleUsernameChange:function(e){
        var value=e.target.value;
        var group_has=value==""?"has-error":""
        this.setState({username:value});
        this.setState({username_group:group_has})
    },
    handlePasswordChange:function(e){
        this.setState({password: e.target.value});
    },
    handleRepasswordChange:function(e){
        var value=e.target.value;
        var group_has=value!==this.state.password?"has-error":"has-success";
        this.setState({repassword:value});
        this.setState({repassword_group:group_has})
    },
    handleSubmit:function(e){
        e.preventDefault();
        var username=this.state.username.trim();
        var password=this.state.password;
        var repassword=this.state.password;
        if(password===repassword && username!=""){
            this.doSubmit(username,password);
        }
    },
    doSubmit:function(username,password){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("/larcache/public/blog/user/create",{
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
                <div className={"form-group "+this.state.repassword_group}>
                    <label htmlFor="inputRePassword" className="col-sm-4 control-label">再次密码</label>
                    <div className="col-sm-4">
                        <input type="password" className="form-control" id="inputRePassword" placeholder="Password" value={this.state.repassword} onChange={this.handleRepasswordChange} />
                    </div>
                </div>
                <div className="form-group">
                    <div className="col-sm-offset-4 col-sm-8">
                        <button type="submit" className="btn btn-default">注册</button>
                        <button type="reset" className="btn btn-default">取消</button>
                    </div>
                </div>
            </form>
        </div>)
    }
});

ReactDOM.render(
        <UserForm />,
        d.getElementById('content')
);