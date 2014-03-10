{{#link-to "posts"}}Volver al índice{{/link-to}}
<form {{action save on="submit"}}>
  <label>Título</label>
  {{input type="text" value=title}}
  {{textarea value=body}}
  <input type="submit" value="Guardar" />
</form>