<form class="js-form-del" action="{{ secure_url("{$table}/{$id}") }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="submit" value="Delete">
</form>