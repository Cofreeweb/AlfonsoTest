<h2>Posts</h2>
{{#each posts in controller}}
  <p>{{#link-to 'posts.edit' posts}} {{posts.title}} {{/link-to}}</p>
{{/each}}