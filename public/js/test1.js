/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ReactDOM.render(
//    <GameBoard />,
//    document.getElementById('content')
//);
var d=document;
var title="标题测试";
var content="测试内容1测试内容1测试内容1测试内容1测试内容1测试内容1测试内容1测试内容1测试内容1\n\
测试内容1测试内容1测试内容1\n\
测试内容1\n\
测试内容1测试内容1测试内容1测试内容1测试内容1\n\
测试内容1测试内容1";
var other=["hello"," world"]

//时间格式化输出
function dateToString(d){
    return [
        d.getFullYear(),
        d.getMonth()+1,
        d.getDate()
    ].join("-");
}

var T1=React.createClass({
    
    render:function(){
        return (
                <div className="divider">
                <h2>{title}</h2><hr />
                <p>{dateToString(new Date())}</p>
                <p>{content}</p>
                <br/>
                <p className=" pull-right">{other}</p>
                </div>
               )
    }
})

var T2=React.createClass({
    displayName:'Divider',
    getDiv1Id:function(){
        return "div111"
    },
    render:function(){
        return (
                    React.createElement("div",{className:"divider",id:this.getDiv1Id()},
                        React.createElement("h2",null,this.props.children),
                        React.createElement("hr",null),
                        React.createElement("p",null,content),
                        React.createElement("div",{className:"pull-right"},other),
                    )
                );
    }
})

var T3=React.createClass({
    render: function(){
        var htmlString={
            __html:"<span>an html string</span>"
        };
        return <div dangerouslySetInnerHTML={htmlString} ></div>
    }
})

var T4=React.createClass({
    getDefaultProps:function(){
//        console.log(this)
    },
    getInitialState:function(){
        console.log(this);
        return null;
    },
    handleClick:function (){
        console.log("aaa");
    },
    render:function (){
        var styles={
            borderColor:"#999",
            borderThickness:"1px"
        };
        return (
                <div>
                <div style={styles}>wererwer</div>
                <div className="btn btn-default" onClick={this.handleClick} >aaa</div>
                </div>
                )
    }
})


var datasource=["abc","ade","react"];
var T5=React.createClass({
    render:function(){
        console.log("render")
        return <input id="aa" />;
    },
    componentDidMount:function(){
        console.log("componentDidMount");
        $("#aa").autocomplete({
            source:datasource
        })
    }
    
})

var T6C=React.createClass({
    getInitialState:function(){
        var cc=this.props.cc;
        return cc
    },
    
    render:function(){
        return (<div>
                <p>{this.state.title}</p>
                <p>{this.state.content}</p>
                <div className="btn btn-default" onClick={this.changeA}>button</div>
                </div>)
    },
    changeA:function(){
        this.setState({title:this.state.title+1})
    },
    
    componentWillReceiveProps:function(nextProps){
        this.setState(nextProps.cc)
    },
})

var T6=React.createClass({
    getDefaultProps:function(){
        
    },
    getInitialState:function(){
        return {cc:[
                {title:"111111",content:"aaaaaaaaaaaaaaaa"},
                {title:"222222",content:"bbbbbbbbbbbbbbbb"},
                {title:"333333",content:"cccccccccccccccc"}
        ]}
    },
    setCC:function(){
        this.setState(this.getInitialState)
    },
    getCC:function(){
        return this.state.cc;
    },
    render:function(){
        var cc=this.getCC();
        return (<div>
                {
                    cc.map(function(ccc,key){
                        return <T6C key={key+1} cc={ccc} />
                    })
                }
                <br/>
                <div className="btn btn-default pull-right" onClick={this.setCC}>还原</div>
                </div>)
    },
    
})


ReactDOM.render(
        <T6  />,
        d.getElementById('content')
)


