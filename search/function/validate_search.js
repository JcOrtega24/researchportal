function required()
{
  var empt = document.searchForm.search.value;
  if (empt === "" || empt === null)
  {
    return false;
  }
  else 
  {
    return true; 
  }
}