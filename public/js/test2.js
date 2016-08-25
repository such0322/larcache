/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d=document;

var T6C=React.createClass({
    getInitialState:function(){
        var state={data:this.props.data};
        return state
    },
    render:function(){
        return (<div>
                <p>{this.state.data.title}</p>
                <p>{this.props.data.content}</p>
                <div className="btn btn-default" onClick={this.changeA}>button</div>
                </div>)
    },
    changeA:function(){
        this.setState({data:{title:this.state.data.title+1}})
    },
    componentWillReceiveProps:function(nextProps){
        if(nextProps.checked%3==nextProps.id%3)
            this.setState({data:{title:nextProps.data.title}})
    },
})

var T6=React.createClass({
    getDefaultProps:function(){
        return {cc:[
                {title:"111111",content:"aaaaaaaaaaaaaaaa"},
                {title:"222222",content:"bbbbbbbbbbbbbbbb"},
                {title:"333333",content:"cccccccccccccccc"}
                ],
                checked:0}
    },
    getInitialState:function(){
        return {checked:this.props.checked}
    },
    setBack:function(){
        this.setState({checked:this.state.checked+1})
    },
    render:function(){
        var checked=this.state.checked
        return (<div>
                {this.props.cc.map(function(vo,ko){
                    return <T6C key={ko} id={ko+1} data={vo} checked={checked} />
                })}
                <br/>
                <div className="btn btn-default pull-right" onClick={this.setBack}>还原</div>
                </div>)
    },
})


ReactDOM.render(
        <T6  />,
        d.getElementById('content')
)


