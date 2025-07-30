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
          // console.log(count);
      }
  }

  getdata();
  function getdata(){
      let hasProduct = true;
      let itemstring = localStorage.getItem('bookCart');
      if(itemstring){
          let itemArray = JSON.parse(itemstring);

          if(itemArray.length == 0){
            hasProduct = false;
          }

          let data = '';
          let no = 1;
          let total = 0;
          $.each(itemArray,function(i,v){
              let image = v.image;
              let name = v.name;
              let author = v.author;
              let price = v.price;
              let qty = v.qty;

              data += `<tr>
                          <td>${no++}</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <img src="${image}" width="75" alt="..." />
                              <div class="ms-3">
                              <div class="fw-bold">${name}</div>
                              <div class="text-muted">${author}</div>
                              </div>
                            </div>
                          </td>
                          <td>
                              <button class="min" data-key="${i}"> - </button>
                              ${qty}
                              <button class="max" data-key="${i}"> + </button>
                          </td>
                          <td>${price}</td>
                          <td>${price * qty}</td>
                          <td>
                              <button type="button" class="btn btn-outline-danger">
                                  <i class="bi bi-trash"></i>
                              </button>
                          </td>
                      </tr>`;

                      total += price * qty;
          })

          data += `<tr>
                      <td colspan="4" align="right">Total</td>
                      <td colspan="4">${total}</td>
                  </tr>`;

          $('tbody').html(data);
      } else {
          hasProduct = false;
      }

      if (!hasProduct) {
          $('#cartTable').html('<h3 class="text-center">No Product Found</h3>');
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