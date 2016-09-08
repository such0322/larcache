/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d = document;

var UserForm=React.createClass({
    getInitialState: function() {
      return {username: '', password: '',repassword:"",username_group:""};
    },
    handleUsernameChange:function(e){
        var value=e.target.value;
        var group_has=value==""?"has-error":"has-success"
        this.setState({username:value});
        this.setState({username_group:group_has})
    },
    handlePasswordChange:function(e){
        this.setState({password: e.target.value});
    },
    handleRepasswordChange:function(e){
        this.setState({repassword: e.target.value});
    },
    handleSubmit:function(e){
        e.preventDefault();
        var username=this.state.username.trim();
        var password=this.state.password;
        var repassword=this.state.password;
        console.log(username)
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
                        <input type="password" className="form-control" id="inputPassword" placeholder="Password" />
                    </div>
                </div>
                <div className="form-group">
                    <label htmlFor="inputRePassword" className="col-sm-4 control-label">再次密码</label>
                    <div className="col-sm-4">
                        <input type="password" className="form-control" id="inputRePassword" placeholder="Password" />
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
        document.getElementById('content')
);