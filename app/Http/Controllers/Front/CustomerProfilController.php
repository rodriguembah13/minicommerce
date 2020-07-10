<?php
/**
 * Created by PhpStorm.
 * User: smartworld
 * Date: 6/30/20
 * Time: 11:37 AM
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\Customers\UpdateCustomerRequest;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;


class CustomerProfilController  extends Controller
{
  //  use CustomerTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('front.customers.edit', ['customer' => $this->customerRepo->findCustomerById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCustomerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        //$customer = $this->customerRepo->findCustomerById($id);
        $customer = auth()->user();
        /*$update = new CustomerRepository($customer);
        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }*/

        //$update->updateCustomer($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('customer_.update',$id);
    }
    public function modify(UpdateCustomerRequest $request)
    {
        $id = auth()->user()->id;
        $customer = $this->customerRepo->findCustomerById($id);
        $update = new CustomerRepository($customer);
        $data = $request->except('_method', '_token', 'password');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update->updateCustomer($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('accounts');
    }

}