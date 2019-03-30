<div class="form-group">
<select class="form-control" name="{{$name ?? "value"}}" id="value">
    @forelse ($values as $item)
      <option>{{$item}}</option>      
    @empty
      <option>1</option>
      <option>2</option>
      <option>3</option>
    @endforelse  
  </select>
</div>