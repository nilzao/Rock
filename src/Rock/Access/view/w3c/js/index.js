function tryLogin() {
    if (formLogin.isValid()) {
	formLogin.submit({
	    waitMsg : 'Acessando...',
	    success : function(form, action) {
		urlFinal = __urlFile + "/" + action.result.ctr + "/"
			+ action.result.method + "/";
		window.location = urlFinal;
	    },
	    failure : function(form, action) {
		Ext.Msg.alert(action.result.title, action.result.msg);
	    }
	});
    }
}

var formLogin = Ext.create('Ext.form.Panel', {
    url : __url + 'access.php/Login/handle/json/',
    xtype : 'login-form',
    region : 'center',
    title : 'Login',
    waitMsgTarget : true,
    frame : true,
    width : 320,
    bodyPadding : 10,

    defaultType : 'textfield',
    defaults : {
	anchor : '100%'
    },

    items : [ {
	xtype : 'hidden',
	name : 'vendor',
	value : 'Sample'
    }, {
	xtype : 'hidden',
	name : 'ctr',
	value : 'Index'
    }, {
	xtype : 'hidden',
	name : 'method',
	value : 'handle'
    }, {
	xtype : 'hidden',
	name : 'ajax',
	value : 1
    }, {
	allowBlank : false,
	fieldLabel : 'E-mail',
	name : 'email',
	emptyText : 'email@somewhere.net'
    }, {
	allowBlank : false,
	fieldLabel : 'Password',
	name : 'passwd',
	emptyText : 'secret',
	inputType : 'password'
    } ],

    buttons : [ {
	text : 'Login',
	id : 'btnLogin',
	handler : tryLogin
    } ]
});

Ext.onReady(function() {
    formLogin.render(Ext.getBody());
    formLogin.center();
});
