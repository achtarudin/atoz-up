<div class="form-group">
<select class="form-control" name="{{$name ?? "value"}}" id="value">
    @forelse ($values as $item)
      <option value={{$item}}>@rupiah($item)</option>      
    @empty
      <option>None</option>
    @endforelse  
  </select>
</div>