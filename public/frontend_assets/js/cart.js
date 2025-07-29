$(document).ready(function(){
  $('.addToCart').click(function(){
      // alert("OK");
      let id = $(this).data('id');
      let image = $(this).data('image');
      let name = $(this).data('name');
      let author = $(this).data('author');
      let price = $(this).data('price');
      // console.log(id,name,price);
      let item = {
          id: id,
          image: image,
          name: name,
          author: author,
          price: price,
          qty: 1
      }
      let itemstring = localStorage.getItem('bookCart') || null;
      let itemArray;
      if(itemstring == null){
          itemArray = [];
      }else{
          itemArray = JSON.parse(itemstring); // string to array
      }

      let status = false;
      $.each(itemArray, function(i,v){
          if(id == v.id){
              v.qty++;
              status = true;
          }
      })
      if (status == false) {
          itemArray.push(item);
      }
      
      let itemdata = JSON.stringify(itemArray); // array to string
      localStorage.setItem('bookCart', itemdata);
      count();
  });

  count();
  function count(){
      let itemstring = localStorage.getItem('bookCart');
      if(itemstring){
          let itemArray = JSON.parse(itemstring);
          //console.log(itemArray);
          
          let count = 0;
          $.each(itemArray, function(i,v){
              if(itemArray != 0){
                  count += v.qty;
                  $('#cart-count').text(count);
              }else{
                  $('#cart-count').text('0')
              }
          })
      }
  }

  getdata();
  function getdata(){
      let itemstring = localStorage.getItem('shops');
      if(itemstring){
          let itemArray = JSON.parse(itemstring);

          let data = '';
          let no = 1;
          let total = 0;
          $.each(itemArray,function(i,v){
              let name = v.name;
              let price = v.price;
              let qty = v.qty;

              data += `<tr>
                          <td>${no++}</td>
                          <td>${name}</td>
                          <td>${price}</td>
                          <td>
                              <button class="min" data-key="${i}"> - </button>
                              ${qty}
                              <button class="max" data-key="${i}"> + </button>
                          </td>
                          <td>${price * qty}</td>
                      </tr>`;

                      total += price * qty;
          })

          data += `<tr>
                      <td colspan="4" align="right">Total</td>
                      <td>${total}</td>
                  </tr>`;

          $('tbody').html(data);
      }
  }

  $('tbody').on('click','.min',function(){
      let key = $(this).data('key');
      // alert("sksdjkjdf");
      let itemstring = localStorage.getItem('shops');
      if(itemstring){
          let itemArray = JSON.parse(itemstring);
          $.each(itemArray, function(i,v){
              if(key == i){
                  v.qty--;
                  if(v.qty== 0){
                      let ans = confirm('Are you sure remove');
                      if (ans) {
                          itemArray.splice(key,1);                            
                      }else{
                          v.qty = 1;
                      }
                  }
              }
          })
          let itemdata = JSON.stringify(itemArray);
          localStorage.setItem('shops',itemdata);
          getdata();
          count();
      }
  })

  $('tbody').on('click','.max',function(){
      let key = $(this).data('key');
      alert("sksdjkjdf");
      let itemstring = localStorage.getItem('shops');
      if(itemstring){
          let itemArray = JSON.parse(itemstring);
          $.each(itemArray, function(i,v){
              if(key == i){
                  v.qty++;
              }
          })
          let itemdata = JSON.stringify(itemArray);
          localStorage.setItem('shops',itemdata);
          getdata();
          count();
      }
  })
});