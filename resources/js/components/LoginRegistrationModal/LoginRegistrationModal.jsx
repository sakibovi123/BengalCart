import React, { useEffect, useState } from "react";
import { IoMdClose } from "react-icons/io";
import { IoShieldCheckmark } from "react-icons/io5";
import { IoPricetagSharp } from "react-icons/io5";
import { Link } from "react-router-dom";
import Utils from "@/Utils.jsx";
import RoundedSpinner from "@/components/Loaders/RoundedSpinner.jsx";

const LoginRegistrationModal = ({ handleCloseModal }) => {

    const { http, setToken } = Utils()
    const [ email, setEmail ] = useState("")
    const [ password, setPassword ] = useState("")
    const [isEmailValid, setIsEmailValid] = useState(true);
    const [ visiblePassword, setVisiblePassword ] = useState(false)
    const [ login, setLogin ] = useState(false)
    const [ register, setRegister ] = useState(false)
    const [ suggestion, setSuggestion ] = useState(false)
    const [ loading, setLoading ] = useState(false)

    const handleEmailSubmit = async () => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            setVisiblePassword(true);

            setLoading(true)

            try {
                const response = await http.post("api/auth/check-email", {
                    email: email,
                });

                if (response.data.existence === true) {
                    setLogin(true);
                    setIsEmailValid(false);
                } else {
                    setRegister(true);
                    setSuggestion(true);
                    setIsEmailValid(false);
                }
            } catch (error) {
                console.error("Error during email validation:", error);
                alert("An error occurred while validating your email. Please try again.");
                return false;
            } finally {
                setLoading(false)
            }
        } else {
            alert("Please enter a valid email");
        }
    };


    const handleRegistration = async () => {

        setLoading(true)

        await http.post('api/auth/register', {
            email: email,
            password: password
        }).then(
            (response) => {
                setToken(response.data.user, response.data.token)
            }
        ).catch(
            (error) => {
                console.log(error)
            }
        ).finally(() => {
            setLoading(false)
        })
    }

    const handleLogin = async () => {
        setLoading(true)
        await http.post('api/auth/login', {
            email: email,
            password: password
        }).then(
            (response) => {
                setToken(response.data.user, response.data.token)
            }
        ).catch(
            (error) => {
                alert('Something went wrong!')
            }
        ).finally(() => {
            setLoading(false)
        })
    }

    useEffect(() => {
        // to hide and disable scroll when modal is open
        document.body.style.overflowY = "hidden";

        // cleanup function to define what to do when modal is unmounted
        return () => {
            document.body.style.overflowY = "auto";
        };
    }, []);


    return (
        <>
            <div
                className="wrapper fixed left-0 right-0 bottom-0 top-0 bg-[#BDBDBDCC]"
                onClick={handleCloseModal}
            ></div>

            <div className="w-[100%] content top-1/2 left-1/2 fixed max-w-2xl -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl shadow-xl">
                {/* actual content for the modal */}
                <div className="px-14 relative pt-12 pb-6 text-center">
                    <button
                        className="top-5 right-5 absolute text-2xl"
                        onClick={handleCloseModal}
                    >
                        <IoMdClose />
                    </button>

                    <h2 className="text-2xl font-bold">Register/Sign in</h2>
                    <p className="flex items-center justify-center gap-3 my-5 text-sm">
                        <span>
                            <IoShieldCheckmark class="text-green-500" />
                        </span>
                        Your information is protected
                    </p>

                    <p className="flex items-center justify-center gap-3 my-5 w-full bg-red-200 text-rose-600 font-bold p-1 rounded shadow-md">
                        <span>
                            <IoPricetagSharp />
                        </span>
                        New shoppers get up to 70% off
                    </p>

                    <div>
                        <input
                            type="email"
                            name=""
                            id=""
                            className="w-full border outline-none p-2 rounded"
                            placeholder="Email"
                            autoComplete={true}
                            onChange={(e) => setEmail(e.target.value)}
                        />

                        {
                            visiblePassword && (
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    className="my-3 w-full border outline-none p-2 rounded"
                                    placeholder="Password"
                                    autoComplete={true}
                                    onChange={(e) => setPassword(e.target.value)}
                                />
                            )
                        }

                        {
                            isEmailValid && (
                                <button onClick={handleEmailSubmit} disabled={loading}
                                        className="text-center p-2 w-full bg-rose-400 my-3 text-white font-bold text-lg rounded shadow-md">
                                    {
                                        loading ? <RoundedSpinner /> : 'Continue'
                                    }
                                </button>
                            )
                        }

                        {
                            login && (
                                <button onClick={handleLogin}
                                        className="p-2 w-full bg-rose-400 my-3 text-white font-bold lg rounded shadow-md">
                                    {
                                        loading ? <RoundedSpinner /> : 'Sign in'
                                    }
                                </button>
                            )
                        }

                        {
                            register && (
                                <div>
                                    <button onClick={handleRegistration}
                                            className="text-center p-2 w-full bg-rose-400 my-3 text-white font-bold lg rounded shadow-md">
                                        {
                                            loading ? <RoundedSpinner /> : 'Sign up'
                                        }
                                    </button>
                                    <small>Only letters & numerica values accepted</small>

                                </div>


                            )
                        }

                    </div>

                    {/*<RoundedSpinner />*/}

                    <Link>
                        <p className="text-customGray underline text-sm my-5">
                            Trouble signing in?
                        </p>
                    </Link>

                    {/*<div class="flex items-center justify-center my-5">*/}
                    {/*    <div class="flex-grow h-px bg-gray-300 mt-1"></div>*/}
                    {/*    <span class="px-3 text-customGray">*/}
                    {/*        Or continue with*/}
                    {/*    </span>*/}
                    {/*    <div class="flex-grow h-px bg-gray-300 mt-1"></div>*/}
                    {/*</div>*/}

                    {/* Login methods */}
                    {/*<div className="flex items-center justify-between">*/}
                    {/*    <p>fb</p>*/}
                    {/*    <p>google</p>*/}
                    {/*    <p>twitter</p>*/}
                    {/*    <p>apple</p>*/}
                    {/*</div>*/}

                    {/*<p>*/}
                    {/*    By continuing, you confirm that you‘re an adult and*/}
                    {/*    you’ve read and accepted our AliExpress Free Membership*/}
                    {/*    Agreement and Privacy Policy.*/}
                    {/*</p>*/}
                </div>
            </div>
        </>
    );
};

export default LoginRegistrationModal;
