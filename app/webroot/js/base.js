window.App = Ember.Application.create();

App.Router.map( function(){
  this.resource( 'posts', function(){
    this.route( 'edit', {path: '/:id'})
  })
})


App.Store = DS.Store.extend({
    revision: 12,
    adapter: DS.RESTAdapter.extend({
      buildURL: function( a, b) {
        console.log( a);
        var normalURL = this._super.apply(this, arguments);
        return '/rest/blog' + normalURL +'/index.json';
      }
    })
});
  
App.Post = DS.Model.extend({
  title: DS.attr('string'),
  body: DS.attr('string')
});

App.PostsIndexRoute = Ember.Route.extend({
  model: function(){
    return this.store.find( 'post');
  }
});

App.PostEditRoute = Ember.Route.extend({
  model: function(){
    return this.store.find( 'post');
  }
});

App.PostsEditController = Ember.ObjectController.extend({
  actions: {
    save: function( data) {
      console.log( this.content);
      $.ajax({
        type: 'post',
        url: '/blog/posts/edit.json',
        data: JSON.stringify( data),
        success: function( data){
          // App.Post.setProperties( data.data)
        }
      });
    }
  }
})

// 
// 
// 
// var App = Ember.Application.create();
// 
// App.ApplicationAdapter = DS.RESTAdapter.extend({
//   host: 'https://http://alfonsotest.site'
// });
// 
// // App.Router.map(function(){
// //   this.resource( 'embers', {path: '/embers'});
// // });
// 
// App.Router.map(function(){
//   this.resource( 'embers.edit', {
//       path: '/embers/edit/:id'
//   });
// });
// 
// App.EmberRoute = Ember.Route.extend({
//   model: function(params) {
//     return this.store.find('embers', params.ember_id);
//   }
// });
// 
// App.Embers = DS.Model.extend({
//   title: DS.attr()
// });
// 
// App.EmbersEditRoute = Ember.Route.extend({
//   // model: function() {
//   //   this.store.push( 'embers', {
//   //     id: 1,
//   //     title: 'Hostias'
//   //   });
//   // }
// });
// 
// App.Post = Ember.Object.create({
// 
// });
// 
// App.Post.setProperties( {
//   id: 1,
//   title: 'Spilberg, el genio',
//   body: 'Vaya con el tío loco'
// });
// 
// App.EmbersEditController = Ember.ObjectController.extend({
//   // initial value
//   isExpanded: false,
//   actions: {
//     save: function( a) {
//       alert( 'viva');
//       $.ajax({
//         type: 'post',
//         url: '/embers/edit.json',
//         data: JSON.stringify(a),
//         success: function( data){
//           App.Post.setProperties( data.data)
//         }
//       });
//     }
//   }
// });