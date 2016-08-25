/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var d=document;

var T6C=React.createClass({
    render:function(){
        return (<div ref={this.props.data.title}>
                    <p>{this.props.data.title}</p>
                    <p>{this.props.data.content}</p>
                    <hr/>
                </div>)
    },
})

var T6=React.createClass({
    getDefaultProps:function(){
        return {cc:[
                {title:"111111",content:"aaaaaaaaaaaaaaaa"},
                {title:"222222",content:"bbbbbbbbbbbbbbbb"},
                {title:"333333",content:"cccccccccccccccc"}
                ],
                status:1
            }
    },
    getInitialState:function(){
        return this.props
    },
    setBack:function(){
        this.setState(this.props)
    },
    setArr:function(){
        this.setState({cc:[
                {title:"aaaa",content:"12312312312312313123123123"},
                {title:"bbbb",content:"qerqwerqwerqwerqwerqwerqwerqwer"},
                {title:"cccc",content:"adfafadfafafaasdfasdfasadfas"}
                ]
            })
    },
    showTag:function(a1,event){
        console.log(a1)
    },
    testbutton2:function(){
        console.log((this.refs.aa))
    },
    render:function(){
        var checked=this.state.checked
        return (<div ref="aa">
                {this.state.cc.map(function(vo,ko){
                    return (<div key={ko}>
                                <T6C data={vo} />
                            </div>)
                })}
            <div className="pull-right" >
                <div className="btn btn-default" onClick={this.testbutton2}>测试2</div>
                <div className="btn btn-default " onDoubleClick={this.showTag.bind(this,"aaa")} onClick={this.setArr}>改变1</div>
                <div className="btn btn-default" onClick={this.setBack}>还原</div>
            </div >
                </div>)
    },
})


ReactDOM.render(
        <T6 url="/react/dataReturn"  />,
        d.getElementById('content')
)


