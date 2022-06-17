import React from "react";
import Helmet from "react-helmet";
import Logo from "@/Shared/Logo";
import TextInput from "@/Shared/TextInput";
import LoadingButton from "@/Shared/LoadingButton";
import {useForm} from "@inertiajs/inertia-react";

export default () => {

  const {data, setData, errors, post, processing} = useForm({
    email: 'johndoe@example.com'
  });

  function handleSubmit(e) {
    e.preventDefault();
    post(route('forgot-password.post'));
  }

  return (
    <div className="flex items-center justify-center min-h-screen p-6 bg-indigo-900">
      <Helmet title="Forgot Password"/>
      <div className="w-full max-w-md">
        <Logo
          className="block w-full max-w-xs mx-auto text-white fill-current"
          height={50}
        />
        <form
          onSubmit={handleSubmit}
          className="mt-8 overflow-hidden bg-white rounded-lg shadow-xl"
        >
          <div className="px-10 py-12">
            <h1 className="text-3xl font-bold text-center">Forgot your password?</h1>
            <div className="w-24 mx-auto mt-6 border-b-2"/>
            <TextInput
              className="mt-6"
              label="Email"
              name="email"
              type="email"
              errors={errors.email}
              value={data.email}
              onChange={e => setData('email', e.target.value)}
            />
          </div>
          <div className="flex items-center justify-between px-10 py-4 bg-gray-100 border-t border-gray-200">
            <a className="hover:underline" tabIndex="-1" href="/login">
              Login
            </a>
            <LoadingButton
              type="submit"
              loading={processing}
              className="btn-indigo"
            >
              Reset Password
            </LoadingButton>
          </div>
        </form>
      </div>
    </div>
  );
};
