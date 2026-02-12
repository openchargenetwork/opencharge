Opencharge network is payments interoperability protocol. It defines a set of api endpoint that can be implemented by any payment, complaince or merchant service.

why.
1. Implement once, connect everywhere. A single implementation gives you access to all other services on the network, you can add, switch or remove service providers without changing a single line of code. 
2. Its Doesnt replace your Api, It expands it. You can keep your current api spec, opencharge simply provided a fresh connection into a network of payment service providers and consumers, you choose what endpoint to implement and who to connect to / accept connections from.
3. Vey simple. Under 6 endpoints that cover discovery, authentication, Tranfers, Orders, Settlement, Kyc/AMl, Qrcode workflows, Crossgateway payments.

4. Free and opensource. Collectively maintained opensource spec, with SDKs, Sandbox, Plugins. Takes the pressure off your dev silo.

5. Decentralized Discovery. The opencharge networks registry is decentralized on the blockchain, this registry is like a database of entities that accept opencharge. It allows other service providers and service consumers to discover your service out of the control of any organization.  Its meeting point for the financial industry - merchants, banks, aml services, exchanges -> you name it.

6. Crossgateway payments via settlement providers. Enable users of one wallet to pay merchants of another service without need for fresh api routing or traditional bank pipelines or reserve accounts!. Instead payments handled by a common third party settlement abiter in the network.





