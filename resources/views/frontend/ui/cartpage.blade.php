@extends('frontend.layout')

@section('content')
  <!-- Product section-->
  <section class="py-5">
      <div class="container px-4 px-lg-5 my-5">
          <div class="row gx-4 gx-lg-5 align-items-center">
              <div class="col-md-8">
                <h1 class="display-5 fw-bolder mb-4">Shopping Cart</h1>

                <div id="cartTable">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col" colspan="2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <th scope="row" class="align-middle">1</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://dummyimage.com/50x100/55595c/fff" alt="..." />
                                        <div class="ms-3">
                                        <div class="fw-bold">Book Name</div>
                                        <div class="text-muted">Book Author</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <input type="number" class="form-control w-50" value="1" min="1">
                                </td>
                                <td class="align-middle">4,500</td>
                                <td class="align-middle">
                                    <div class="fw-bold">4,500</div>
                                </td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end" scope="row" colspan="4">Subtotal</td>
                                <td colspan="2">
                                    <div class="fw-bold">4,500</div>
                                </td>
                            </tr>
                            <tr class="border-0 border-top">
                                <td class="text-end" scope="row" colspan="4">Discount</td>
                                <td colspan="2">
                                    <div class="fw-bold">500</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-end" scope="row" colspan="4">Total</td>
                                <td colspan="2">
                                    <div class="fw-bold">4,000</div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
              </div>
              <div class="col-md-4">
                  <h1 class="display-6 fw-bolder mb-4">Payment Info.</h1>

                  {{-- form with payment method --}}
                  <form action="">
                      <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="kpay">
                            <label class="form-check-label" for="kpay">
                                KPay
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="wave" checked>
                            <label class="form-check-label" for="wave">
                                Wave
                            </label>
                          </div>
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Contact phone number">
                      </div>
                      <div class="mb-3">
                          <textarea  class="form-control" placeholder="Shipping Address"></textarea>
                      </div>
                      @guest
                        <a href="{{route('login')}}" type="button" class="btn btn-primary">Login to Checkout</a>
                      @else
                        <button type="button" class="btn btn-primary">Checkout</button>
                      @endguest
                  </form>
              </div>
          </div>
      </div>
  </section>
@endsection