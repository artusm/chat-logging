webpackJsonp([5],{"11jQ":function(e,t,r){"use strict";t.a={computed:{currentServer:{set:function(e){this.$store.commit("app/setCurrentServer",e)},get:function(){return this.$store.state.app.currentServer}}}}},lESZ:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var s=r("Dd8w"),n=r.n(s),l=r("NYxO"),c={name:"server-switcher",mixins:[r("11jQ").a],computed:n()({},Object(l.b)("app",["showServersTabs"]),Object(l.c)("app",["servers"]))},a=function(){var e=this,t=e.$createElement,r=e._self._c||t;return e.showServersTabs?r("q-tabs",{attrs:{align:"center",color:"light-blue",position:"top"},model:{value:e.currentServer,callback:function(t){e.currentServer=t},expression:"currentServer"}},[r("q-tab",{key:"all",attrs:{slot:"title",name:"all",label:"Все",icon:"cast_connected"},slot:"title"}),e._v(" "),e._l(e.servers,function(e,t){return r("q-tab",{key:t,attrs:{slot:"title",name:t,label:e.fullName,icon:"cast"},slot:"title"})})],2):e._e()},o=[];a._withStripped=!0;var i=r("XyMi"),u=Object(i.a)(c,a,o,!1,null,null,null);u.options.__file="src\\components\\server-switcher.vue";t.default=u.exports}});