<?php

namespace App\Http\Controllers\Auth;

use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Customers\Requests\RegisterCustomerRequest;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/accounts';

    private $customerRepo;
    private $cartRepository;

    /**
     * Create a new controller instance.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CartRepository $cartRepository, CustomerRepositoryInterface $customerRepository)
    {
        $this->middleware('guest');
        $this->customerRepo = $customerRepository;
        $this->cartRepository = $cartRepository;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return Customer
     */
    protected function create(array $data)
    {
        return $this->customerRepo->createCustomer($data);
    }

    /**
     * @param RegisterCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterCustomerRequest $request)
    {
        $customer = $this->create($request->except('_method', '_token'));
        Auth::login($customer);
        if ($this->cartRepository->getCartItems() !== null) {
            return redirect()->route('checkout_table.index');
        } else {
            return redirect()->route('accounts');
        }
        //return redirect()->route('accounts');
    }
}
