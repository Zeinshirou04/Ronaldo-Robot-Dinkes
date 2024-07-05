export default function RonaldoEye() {
    return (
        <section
            id="display"
            className="w-svw h-svh flex flex-row justify-center items-center"
        >
            <div
                id="baseEye"
                style={{
                    maxWidth: "800px",
                    maxHeight: "480px",
                }}
                className="w-full h-full flex flex-row justify-center items-center gap-52 bg-black"
            >
                <style>
                    {`
                        @keyframes idle-eye {
                            0%, 10% { transform: translate(-50%, -50%); }    /* Center */
                            20%, 30% { transform: translate(-70%, -50%); }  /* Look left */
                            40%, 50% { transform: translate(-50%, -50%); }  /* Center */
                            60%, 70% { transform: translate(-30%, -50%); }  /* Look right */
                            80%, 100% { transform: translate(-50%, -50%); } /* Center and delay */
                        }
                    `}
                </style>
                <div
                    id="eyes-left"
                    className="w-1/4 h-3/5 bg-white relative"
                    style={{
                        borderRadius: "70%",
                    }}
                >
                    <div
                        id="pupil-left"
                        className="w-1/2 h-3/5 bg-black absolute"
                        style={{
                            top: '50%',
                            transform: 'translateY(-50%)',
                            left: '50%',
                            borderRadius: "70%",
                            animationName: 'idle-eye',
                            animationDuration: '20s',
                            animationIterationCount: 'infinite',
                            animationTimingFunction: 'ease-in-out'
                        }}
                    ></div>
                </div>
                <div
                    id="eyes-right"
                    className="w-1/4 h-3/5 bg-white relative"
                    style={{
                        borderRadius: "70%",
                    }}
                >
                    <div
                        id="pupil-right"
                        className="w-1/2 h-3/5 bg-black absolute"
                        style={{
                            top: '50%',
                            transform: 'translateY(-50%)',
                            left: '50%',
                            borderRadius: "70%",
                            animationName: 'idle-eye',
                            animationDuration: '20s',
                            animationIterationCount: 'infinite',
                            animationTimingFunction: 'ease-in-out'
                        }}
                    ></div>
                </div>
            </div>
        </section>
    );
}
